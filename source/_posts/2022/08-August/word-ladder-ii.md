---
extends: _layouts.post
section: content
title: Word ladder II
problemUrl: https://leetcode.com/problems/word-ladder-ii/
date: 2022-08-14
categories: [graph]
---

We will first run a BFS to create the graph with adjacency list. Then we will run DFS to find all possible paths of that graph.

```python
class Solution:
    def findLadders(self, beginWord: str, endWord: str, wordList: List[str]) -> List[List[str]]:
        wordList = set(wordList)
        if endWord not in wordList:
            return []
        
        # BFS visit
        curr_level = {beginWord}
        parents = collections.defaultdict(list)
        
        while curr_level:
            wordList -= curr_level
            next_level = set()
            for word in curr_level:
                for i in range(len(word)):
                    for c in 'abcdefghijklmnopqrstuvwxyz':
                        new_word = word[:i] + c + word[i+1:]
                        if new_word in wordList:
                            next_level.add(new_word)
                            parents[new_word].append(word)
            if endWord in next_level:
                break
            curr_level = next_level
        
        # DFS reconstruction
        res = []
        def dfs(word, path):
            if word == beginWord:
                path.append(word)
                res.append(path[::-1])
            else:
                for p_word in parents[word]:
                    dfs(p_word, path + [word])
        dfs(endWord, [])
        
        return res
```

Time Complexity: `O((n+m)*l)`, n is the number of words, m is number of edges(m = n^2), l is maximum word length <br/>
Space Complexity: `O((n+m)*l)`