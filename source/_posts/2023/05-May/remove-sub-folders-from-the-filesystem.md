---
extends: _layouts.post
section: content
title: Remove sub folders from the filesystem
problemUrl: https://leetcode.com/problems/remove-sub-folders-from-the-filesystem/
date: 2023-05-15
categories: [trie]
---

We can use a trie data structure to store all the folders. We will iterate over the folders and insert them into the trie. If we find a folder that is already present in the trie, we will mark it as a duplicate. We will return all the folders that are not marked as duplicates.

```python
class TrieNode:
    def __init__(self):
        self.children = {}
        self.isEnd = False

class Trie:
    def __init__(self):
        self.root = TrieNode()
        
    def insert(self, word):
        node = self.root
        for char in word:
            if char not in node.children:
                node.children[char] = TrieNode()
            node = node.children[char]
        node.isEnd = True  
    
    def find(self):
        def dfs(direc, node):
            if node.isEnd:
                answer.append('/' + '/'.join(direc))
                return
            for char in node.children:
                dfs(direc + [char], node.children[char])
        
        answer = []
        dfs([], self.root)
        return answer


class Solution:
    def removeSubfolders(self, folder: List[str]) -> List[str]:
        trie = Trie()
        for f in folder:
            f = f.split('/')[1:]
            trie.insert(f)
        return trie.find()
```

Time complexity: `O(n * m)` <br/>
Space complexity: `O(n * m)`