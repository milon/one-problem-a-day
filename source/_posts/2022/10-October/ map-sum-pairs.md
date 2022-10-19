---
extends: _layouts.post
section: content
title: Map sum pairs
problemUrl: https://leetcode.com/problems/map-sum-pairs/
date: 2022-10-19
categories: [trie]
---

We will take a trie and a map. The map will store the key and the value. The trie will store the sum of all the values of the keys that start with the current prefix. We will iterate over all the keys and insert them in the trie. For inserting a key, we will take a pointer to the root of the trie and iterate over all the characters of the key. If the character is not present in the trie, we will create a new node and move the pointer to the new node. Else we will move the pointer to the existing node. After iterating over all the characters, we will store the value in the node. Now for the sum function, we will take a pointer to the root of the trie and iterate over all the characters of the prefix. If the character is not present in the trie, we will return 0. Else we will move the pointer to the existing node. After iterating over all the characters, we will return the sum of the node.

```python
class TrieNode:
    def __init__(self):
        self.children = {}
        self.freq = 0

class MapSum:
    def __init__(self):
        self.root = TrieNode()
        self.dic = {}

    def insert(self, key: str, val: int) -> None:
        delta = val - self.dic.get(key, 0)
        self.dic[key] = val
        node = self.root
        node.freq += delta
        for symbol in key:
            node = node.children.setdefault(symbol, TrieNode())
            node.freq += delta

    def sum(self, prefix: str) -> int:
        node = self.root
        for symbol in prefix:
            if symbol not in node.children:
                return 0
            node = node.children[symbol]
        return node.freq

# Your MapSum object will be instantiated and called as such:
# obj = MapSum()
# obj.insert(key,val)
# param_2 = obj.sum(prefix)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`