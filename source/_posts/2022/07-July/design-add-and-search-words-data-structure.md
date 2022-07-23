---
extends: _layouts.post
section: content
title: Design add and search words data structure
problemUrl: https://leetcode.com/problems/design-add-and-search-words-data-structure/
date: 2022-07-23
categories: [trie]
---

We will implement the trie as normal, the addWord function will be identical to a normal trie. The search function will be a little different. We will iterate over each character, if the character is a normal alphabet, we will do it as it is. But if it is a `"."`, then we will run DFS on every child node of that node to get the result.

```python
class TrieNode:
    def __init__(self):
        self.children = {}
        self.word = False

class WordDictionary:
    def __init__(self):
        self.root = TrieNode()

    def addWord(self, word: str) -> None:
        current = self.root
        for c in word:
            if c not in current.children:
                current.children[c] = TrieNode()
            current = current.children[c]
        current.word = True

    def search(self, word: str) -> bool:
        def dfs(j, root):
            current = root
            for i in range(j, len(word)):
                c = word[i]
                if c == ".":
                    for child in current.children.values():
                        if dfs(i+1, child):
                            return True
                    return False
                else:
                    if c not in current.children:
                        return False
                    current = current.children[c]
            return current.word
        return dfs(0, self.root)
    

# Your WordDictionary object will be instantiated and called as such:
# obj = WordDictionary()
# obj.addWord(word)
# param_2 = obj.search(word)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`