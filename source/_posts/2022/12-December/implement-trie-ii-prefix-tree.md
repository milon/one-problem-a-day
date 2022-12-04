---
extends: _layouts.post
section: content
title: Implement trie II (prefix tree)
problemUrl: https://leetcode.com/problems/implement-trie-ii-prefix-tree/
date: 2022-12-04
categories: [trie, design]
---

We will use a trie to solve this problem. We will store the count of each word in the trie. We will also store the count of each prefix in the trie. We will increment the count of the word and the prefix whenever we insert a word. We will decrement the count of the word and the prefix whenever we delete a word. We will return the count of the prefix whenever we search for a prefix.

```python
class Node:
    def __init__(self):
        self.children = dict()
        self.count = 0
        
class Trie:
    def __init__(self):
        self.root = Node()

    def insert(self, word: str) -> None:
        node = self.root
        word += '.'
        
        for c in word:
            if c not in node.children:
                node.children[c] = Node()
                
            node = node.children[c]
            node.count += 1

    def countWordsEqualTo(self, word: str) -> int:
        node = self.root
        word += '.'
        
        for c in word:
            if c not in node.children:
                return 0
            
            node = node.children[c]
            
        return node.count

    def countWordsStartingWith(self, prefix: str) -> int:
        node = self.root
        
        for c in prefix:
            if c not in node.children:
                return 0
            
            node = node.children[c]
            
        return node.count

    def erase(self, word: str) -> None:
        node = self.root
        word += '.'
        
        for c in word:
            node = node.children[c]
            node.count -= 1

# Your Trie object will be instantiated and called as such:
# obj = Trie()
# obj.insert(word)
# param_2 = obj.countWordsEqualTo(word)
# param_3 = obj.countWordsStartingWith(prefix)
# obj.erase(word)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`