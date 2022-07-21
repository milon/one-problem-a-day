---
extends: _layouts.post
section: content
title: Implement trie prefix tree
problemUrl: https://leetcode.com/problems/implement-trie-prefix-tree/
date: 2022-07-21
categories: [trie]
---

This problem literary ask to implement a prefix tree or Trie. Each node will have children for which we have used a hashmap for constant time insert and lookup abd a boolean value to denote whether it's the end of the word or not.

```python
class TrieNode:
    def __init__(self):
        self.children = {}
        self.end = False

class Trie:
    def __init__(self):
        self.root = TrieNode()

    def insert(self, word: str) -> None:
        curr = self.root
        for c in word:
            if c not in curr.children:
                curr.children[c] = TrieNode()
            curr = curr.children[c]
        curr.end = True

    def search(self, word: str) -> bool:
        curr = self.root
        for c in word:
            if c not in curr.children:
                return False
            curr = curr.children[c]
        return curr.end == True

    def startsWith(self, prefix: str) -> bool:
        curr = self.root
        for c in prefix:
            if c not in curr.children:
                return False
            curr = curr.children[c]
        return True

# Your Trie object will be instantiated and called as such:
# obj = Trie()
# obj.insert(word)
# param_2 = obj.search(word)
# param_3 = obj.startsWith(prefix)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`