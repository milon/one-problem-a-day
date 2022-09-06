---
extends: _layouts.post
section: content
title: Implement magic dictionary
problemUrl: https://leetcode.com/problems/implement-magic-dictionary/
date: 2022-09-06
categories: [trie]
---

We will use the Trie data structure to store all the elements in the dictionary. Building the dictionary is pretty strait forward, we will insert all the words from the dictionary to the trie. 

As we cannot assume the input do not contain one-character difference pairs, we should dfs for possible string prior to regular spell check. The DFS is exactly the same as regular spell check, because we have used the one character quota. If there are other children available, try each of them before trying the input itself, we have to remember that the output of search will be false, if we can not find a match with specific one character mismatch.

```python
class TrieNode:
    def __init__(self):
        self.children = {}
        self.isEnd = False
        
class MagicDictionary:
    def __init__(self):
        self.trie = TrieNode()
    
    def dfs(self, node, string):
        for c in string:
            if c in node.children:
                node = node.children[c]
            else:
                return False
        if node.isEnd:
            return True
    
    def buildDict(self, dictionary: List[str]) -> None:
        for word in dictionary:
            node = self.trie
            for c in word:
                if c not in node.children:
                    node.children[c] = TrieNode()
                node = node.children[c]
            node.isEnd = True

    def search(self, searchWord: str) -> bool:
        node = self.trie
        for i, c in enumerate(searchWord):
            if not node.children:
                return False
            elif c not in node.children:
                for child in node.children:
                    if self.dfs(node, child + searchWord[i+1:]):
                        return True
                return False
            else:
                for child in node.children:
                    if child != c and self.dfs(node, child + searchWord[i+1:]):
                        return True
                node = node.children[c]                
        if node.isEnd:
            return False

# Your MagicDictionary object will be instantiated and called as such:
# obj = MagicDictionary()
# obj.buildDict(dictionary)
# param_2 = obj.search(searchWord)
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n)`
